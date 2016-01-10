<?php

declare(strict_types = 1);

namespace unreal4u\Telegram\Types;

use unreal4u\InternalFunctionality\AbstractFiller;
use unreal4u\Telegram\Types\Custom\UserProfilePhotosArray;

/**
 * This object represent a user's profile pictures.
 *
 * Objects defined as-is january 2016
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends AbstractFiller
{
    /**
     * Total number of profile pictures the target user has
     * @var int
     */
    public $total_count = 0;

    /**
     * Requested profile pictures (in up to 4 sizes each)
     * NOTE: Is an array of an array of PhotoSize objects
     *
     * @var array
     */
    public $photos = [];

    public function __construct(\stdClass $data)
    {
        if (!empty($data->photos)) {
            $photoArray = new UserProfilePhotosArray($data->photos);
            $data->photos = [$photoArray->data];
        }

        parent::__construct($data);
    }
}