require('./bootstrap');

require('alpinejs');

tinymce.init({
    selector:'textarea.editor',
    forced_root_block : "",
    selector:'textarea',
    relative_urls: true,
    fullpage_default_encoding: 'UTF-8',
    plugins: 'link',
});