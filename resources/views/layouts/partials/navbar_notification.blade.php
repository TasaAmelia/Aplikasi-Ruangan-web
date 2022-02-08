<div class="dropdown-menu dropdown-list dropdown-menu-right">
    <div class="dropdown-header">Notifications
        <div class="float-right">
        <a href="#" onclick="markasread()">Mark All As Read</a>
    </div>
    </div>
    <div class="dropdown-list-content dropdown-list-icons">
        @foreach (auth()->user()->unreadNotifications as $notification)
        <div class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-code"></i>
            </div>
            <div class="dropdown-item-desc">
                Ruangan {{ $notification->data['ruangan'] }} Dengan Peminjam {{ $notification->data['user'] }} Status nya {{ $notification->data['message'] }}
            </div>
        </div>
        @endforeach
</div>
