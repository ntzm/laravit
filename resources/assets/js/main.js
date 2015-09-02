var reader = new commonmark.Parser();
var writer = new commonmark.HtmlRenderer({
    safe: true // Prevent previewing javascript:<code> XSS attacks
});

/**
 * Escape HTML to prevent certain XSS attacks from previewing
 *
 * @param  {string} html - Unescaped HTML
 * @return {string}      - Escaped HTML
 */
function escapeHtml(html) {
    return $('<div/>').text(html).html();
}

$('[data-preview]').on('change keyup paste', function () {
    var target = $($(this).data('preview'));
    var escaped = escapeHtml($(this).val());
    if ($(this).data('markdown') !== undefined) {
        var result = writer.render(reader.parse(escaped));
    } else {
        var result = escaped;
    }
    $(target).html(result);
});
