<?php

namespace App\Traits;

trait CanResetPassword {
    /**
     * Get the e-mail address where password reset links are sent. */
    public function getEmailForPasswordReset() {
        return $this->email; }
    /**
     * Send the password reset notification. */
    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token)); }
}
