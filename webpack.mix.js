const mix = require("laravel-mix");

mix.sass("resources/sass/app.scss", "public/css")
    .options({
        processCssUrls: false,
    })
    .sourceMaps()
    .vue()
    .js("resources/js/bbs.js", "public/js/webpack");

// npm run prodでコンパイルしたファイルにバージョン情報を付加（キャッシュ対策）
if (mix.inProduction()) {
    mix.version();
}
