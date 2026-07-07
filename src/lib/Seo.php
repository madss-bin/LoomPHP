<?php

namespace LoomPHP;

class Seo
{
    protected array $data = [
        "title" => "LoomPHP — Opinionated Boilerplate",
        "description" => "",
        "og" => [],
        "schemas" => [],
    ];

    public function title(string $title): static
    {
        $this->data["title"] = $title;
        return $this;
    }

    public function description(string $description): static
    {
        $this->data["description"] = $description;
        return $this;
    }

    public function og(string $property, string $content): static
    {
        $this->data["og"][$property] = $content;
        return $this;
    }

    public function schema(string $type, array $data = []): static
    {
        $this->data["schemas"][] = array_merge(
            ["@context" => "https://schema.org"],
            $data,
            ["@type" => $type],
        );
        return $this;
    }

    public function renderTitle(): string
    {
        return htmlspecialchars($this->data["title"]);
    }

    public function renderMeta(): string
    {
        $parts = [];
        if ($this->data["description"] !== "") {
            $parts[] =
                '<meta name="description" content="' .
                htmlspecialchars($this->data["description"]) .
                '">';
        }
        foreach ($this->data["og"] as $property => $content) {
            $parts[] =
                '<meta property="' .
                htmlspecialchars($property) .
                '" content="' .
                htmlspecialchars($content) .
                '">';
        }
        return implode("\n    ", $parts);
    }

    public function renderSchema(): string
    {
        if ($this->data["schemas"] === []) {
            return "";
        }
        $json = json_encode(
            count($this->data["schemas"]) === 1
                ? $this->data["schemas"][0]
                : $this->data["schemas"],
            JSON_UNESCAPED_SLASHES |
                JSON_UNESCAPED_UNICODE |
                JSON_THROW_ON_ERROR,
        );
        return "\n    " .
            '<script type="application/ld+json">' .
            $json .
            "</script>";
    }
}
