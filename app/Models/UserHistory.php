<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHistory extends Model
{
    use HasFactory;

    protected $table = 'user_history';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setUserId(int $value): void
    {
        $this->attributes['user_id'] = $value;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->attributes['message'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setMessage(?string $value): void
    {
        $this->attributes['message'] = $value;
    }

    /**
     * @return string|null
     */
    public function getModule(): ?string
    {
        return $this->attributes['module'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setModule(?string $value): void
    {
        $this->attributes['module'] = $value;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->attributes['action'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setAction(?string $value): void
    {
        $this->attributes['action'] = $value;
    }

    /**
     * @return string|null
     */
    public function getController(): ?string
    {
        return $this->attributes['controller'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setController(?string $value): void
    {
        $this->attributes['controller'] = $value;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->attributes['ip'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setIp(?string $value): void
    {
        $this->attributes['ip'] = $value;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->attributes['content'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setContent(?string $value): void
    {
        $this->attributes['content'] = $value;
    }
}
