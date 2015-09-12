{{--Facebook tags--}}
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:site_name" content="Laravit">
<meta property="og:see_also" content="{{ Request::root() }}">

{{--Twitter tags--}}
<meta name="twitter:url" content="{{ Request::url() }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:card" content="summary">
