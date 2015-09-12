# Contributing to Laravit

## Coding style

Please follow the [PSR-2 coding style][1].

In addition to these standards, you MUST also leave one blank line between `<?php` and the namespace declaration.

```php
<?php

namespace App\Http\Controllers;

use App\Example;

class ExampleController extends Controller
{
    // ...
}
```

## Pull requests

Ensure your branch has a name that describes the new feature or fix well.
For example, `post-and-comment-saving` would be a good name for a branch that adds a save feature to posts and comments.

Please use descriptive commit messages following [these guidelines][2], which can
be broken down into these 7 rules:

1. Separate subject from body with a blank line
2. Limit the subject line to 50 characters
3. Capitalize the subject line
4. Do not end the subject line with a period
5. Use the imperative mood in the subject line
6. Wrap the body at 72 characters
7. Use the body to explain what and why vs. how

[1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[2]: http://chris.beams.io/posts/git-commit
