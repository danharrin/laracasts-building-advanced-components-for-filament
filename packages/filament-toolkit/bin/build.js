import * as esbuild from 'esbuild'

esbuild.build({
    entryPoints: ['./resources/js/iro.js'],
    outfile: './dist/iro.js',
    bundle: true,
    mainFields: ['module', 'main'],
    platform: 'browser',
    treeShaking: true,
    target: ['es2020'],
    minify: true,
})
