<?php

class Page
{
    private int $id;
    private string $url;
    private string $body_markup;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /** 
     * @param string|null $url 
     * @return self
     */
    public function setUrl(?string $url = null): self
    {
        if ($url === null) {
            $this->url = '';
        } else {
            $this->url = $url;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getBody_markup(): string
    {
        return $this->body_markup;
    }

    /**
     * @param string $body_markup 
     * @return self
     */
    public function setBody_markup(string $body_markup): self
    {
        $this->body_markup = $body_markup;
        return $this;
    }
}

?>