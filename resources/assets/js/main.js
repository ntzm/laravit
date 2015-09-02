var reader = new commonmark.Parser();
var writer = new commonmark.HtmlRenderer({
    safe: true // Prevent previewing javascript:<code> XSS attacks
});

var settings = {
    voteClassDefault: 'btn-default',
    voteClassPressed: 'btn-info',
    voteClassToggle: 'btn-default btn-info'
};

var api = {
    votePost: function (slug, type) {
        $.get('/api/posts/' + slug + '/vote/' + type);
    }
};

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

$('[data-vote]').on('click', function () {
    // Clicked button
    var $clicked = $(this);
    // Post container
    var $post = $clicked.closest('[data-slug]');
    // Post slug identifier
    var slug = $post.data('slug');
    // Vote type (1/-1)
    var type = Number($clicked.data('vote'));
    // Opposite button
    var $opposite = $post.find('[data-vote=' + -type + ']');

    if ($opposite.hasClass(settings.voteClassPressed)) {
        // User is changing their vote from one type to another
        $opposite.toggleClass(settings.voteClassToggle);
        $clicked.toggleClass(settings.voteClassToggle);
    } else if ($clicked.hasClass(settings.voteClassDefault)) {
        // User is removing their vote
        $clicked.toggleClass(settings.voteClassToggle);
        type = 0;
    } else {
        // User is voting
        $clicked.toggleClass(settings.voteClassToggle);
    }

    api.votePost(slug, type);
})
