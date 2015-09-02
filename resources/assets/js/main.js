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

$('#content').on('change keyup paste', function() {
    var escapedComment = escapeHtml($(this).val());
    var result = writer.render(reader.parse(escapedComment));
    $('#preview').html(result);
});
