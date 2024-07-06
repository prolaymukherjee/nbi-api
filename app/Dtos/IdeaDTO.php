<?php

namespace App\Dtos;

class IdeaDTO extends BaseDTO
{
    private int $user_id;

    private string $uuid;

    private string $ideator_name;

    private string $title;

    private string $description;

    public function __construct(string $uuid = '', ?int $user_id = null, string $title = '', string $description = '', ?string $ideator_name = null)
    {
        $this->uuid = $uuid;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->ideator_name = $ideator_name;
    }

    public static function fromModel($idea): self
    {
        return new self(
            $idea->uuid,
            $idea->user_id,
            $idea->title,
            $idea->description,
            $idea->ideator->name,
        );
    }

    public static function fromRequest($ideaRequest): self
    {
        return new self(
            '',
            $ideaRequest['user_id'],
            $ideaRequest['title'],
            $ideaRequest['description'],
            ''
        );
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'ideator' => $this->ideator_name,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
