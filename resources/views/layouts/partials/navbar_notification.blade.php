<div class="dropdown-menu dropdown-list dropdown-menu-right">
    <div class="dropdown-header">Notifications
    </div>
    <div class="dropdown-list-content dropdown-list-icons">
        @foreach (auth()->user()->unreadNotifications as $notification)
        <div class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-code"></i>
            </div>
            <div class="dropdown-item-desc">
                {{ $notification->data['user'] }} Meminjam Ruangan {{ $notification->data['ruangan'] }}
                <a href=""><div class="time text-primary">Mark as read</div></a>
            </div>
        </div>
        @endforeach
</div>
