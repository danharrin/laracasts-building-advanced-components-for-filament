<?php

namespace DanHarrin\FilamentToolkit\Concerns;

trait CanBeSection
{
    protected string | \Closure | null $description = null;

    protected string | \Closure | null $icon = null;

    public function __construct(
        protected string | \Closure $heading,
    )
    {
    }

    public static function make(string | \Closure $heading): static
    {
        return app(static::class, ['heading' => $heading]);
    }

    public function description(string | \Closure | null $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function icon(string | \Closure | null $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getHeading(): string
    {
        return $this->evaluate($this->heading);
    }

    public function getIcon(): string
    {
        return $this->evaluate($this->icon);
    }

    public function getDescription(): ?string
    {
        return $this->evaluate($this->description);
    }
}
