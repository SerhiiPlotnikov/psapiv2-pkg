<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Channel;

final class Channel extends ShortChannel
{
    public $department;
    public $app_name;
    public $created_at;

    protected $casts = [
        'created_at' => 'date'
    ];
}
