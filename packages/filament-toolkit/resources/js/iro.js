import iro from '@jaames/iro'

export default function colorPicker({
    state,
    width,
}) {
    return {
        state,

        init() {
            const colorPicker = new iro.ColorPicker(this.$refs.picker, {
                ...(width ? { width } : {}),
                color: this.state,
            });

            colorPicker.on('color:change', (color) => {
                this.state = color.hexString
            })
        }
    }
}
