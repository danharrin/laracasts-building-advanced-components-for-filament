<?php

namespace App\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use Livewire\Component;

class TextInput implements Htmlable
{
    use Macroable;

    protected string | \Closure $label;

    protected int | \Closure | null $maxLength = null;

    protected Component $livewire;

    protected static array $configurations = [];

    public function __construct(
        protected string $name,
    )
    {
    }

    public static function make(string $name): self
    {
        $input = new self($name);

        foreach (self::$configurations as $configuration) {
            $configuration($input);
        }

        return $input;
    }

    public static function configureUsing(\Closure $configure): void
    {
        self::$configurations[] = $configure;
    }

    public function label(string | \Closure $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function maxLength(int | \Closure | null $length): self
    {
        $this->maxLength = $length;

        return $this;
    }

    public function livewire(Component $livewire): self
    {
        $this->livewire = $livewire;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->evaluate($this->label ?? null) ?? str($this->name)
            ->title();
    }

    public function evaluate($value)
    {
        if ($value instanceof \Closure) {
            return app()->call($value, [
                'foo' => 'bar',
                'random' => Str::random(),
                'state' => $this->livewire->{$this->getName()},
            ]);
        }

        return $value;
    }

    public function extractPublicMethods(): array
    {
        $reflection = new \ReflectionClass($this);

        $methods = [];

        foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            $methods[$method->getName()] = \Closure::fromCallable([$this, $method->getName()]);
        }

        return $methods;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxLength(): ?int
    {
        return $this->evaluate($this->maxLength);
    }

    public function render(): View
    {
        return view('components.text-input', $this->extractPublicMethods());
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }
}
