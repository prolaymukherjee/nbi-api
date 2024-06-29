<?php

namespace App\Dtos;

use App\Models\Idea;

class IdeaDTO extends BaseDTO
{
    public ?int $user_id;
    public ?string $ideator_name;
    public string $title;
    public string $description;

    public function __construct(?int $user_id = null, string $title = '', string $description = '', ?string $ideator_name = null, )
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->ideator_name = $ideator_name;
    }

    public static function fromModel($idea): self
    {
        return new self(
            $idea->user_id,
            $idea->title,
            $idea->description,
            $idea->ideator->name,
        );
    }

    public static function fromRequest($ideaRequest): self
    {
        return new self(
            $ideaRequest['user_id'],
            $ideaRequest['title'],
            $ideaRequest['description']
        );
    }

    public function toArray(): array
    {
        return [
            'ideator' => $this->ideator_name,
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}
