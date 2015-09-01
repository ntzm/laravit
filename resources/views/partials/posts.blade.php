@each('partials.post', $posts, 'post', 'partials.nothing')
{!! $posts->render() !!}
