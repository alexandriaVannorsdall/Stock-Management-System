<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class UserForm extends Component
{
    /**
     * @var User|null
     */
    public ?User $user;

    /**
     * @var ViewErrorBag
     */
    public ViewErrorBag $errors;

    /**
     * @param User|null $user
     * @param ViewErrorBag $errors
     */
    public function __construct(?User $user, ViewErrorBag $errors)
    {
        $this->user = $user;
        $this->errors = $errors;
    }

    /**
     * @return string
     */
    public function action(): string
    {
        if ($this->user) {
            return route('users.update', ['user' => $this->user]);
        }
        return route('users.store');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.user-form');
    }
}
