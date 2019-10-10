<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Review;

use Psapiv2\DataTransformer\AbstractObjectHydrator;

final class Review extends AbstractObjectHydrator
{
    public $id;
    public $name;
    public $rating;
    public $description;
    public $created_by_review;
    public $product_pim_id;
    public $preview_review;
    public $channel_id;
    public $referrer;
    public $redacted_description;
    public $submitted_by_reviewer;
    public $approved_at;
    public $rejected_by_reviewer;
    public $rejected_at;
    public $rejected_notes;
    public $count_helpful;

    protected $casts = [
        'approved_at' => 'date'
    ];
}
