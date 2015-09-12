var reader = new commonmark.Parser();
var writer = new commonmark.HtmlRenderer({
    safe: true // Prevent previewing javascript:<code> XSS attacks
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var settings = {
    voteClassDefault: 'btn-secondary-outline',
    voteClassPressed: 'btn-primary-outline',
    voteClassToggle: 'btn-secondary-outline btn-primary-outline'
};

var api = {
    voteOnPost: function (sub, slug, value) {
        $.ajax({
            method: 'put',
            url: '/sub/' + sub + '/post/' + slug + '/vote/' + value
        });
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
    // Post sub
    var sub = $post.data('sub');
    // Post slug identifier
    var slug = $post.data('slug');
    // Vote type (1/-1)
    var value = Number($clicked.data('vote'));
    // Opposite button
    var $opposite = $post.find('[data-vote=' + -value + ']');

    if ($opposite.hasClass(settings.voteClassPressed)) {
        // User is changing their vote from one value to another
        $opposite.toggleClass(settings.voteClassToggle);
        $clicked.toggleClass(settings.voteClassToggle);
    } else if ($clicked.hasClass(settings.voteClassPressed)) {
        // User is removing their vote
        $clicked.toggleClass(settings.voteClassToggle);
        value = 0;
    } else {
        // User is voting
        $clicked.toggleClass(settings.voteClassToggle);
    }

    api.voteOnPost(sub, slug, value);
})
