<div class="dropdown-menu dropdown-list dropdown-menu-right">
    <div class="dropdown-header">Notifications
        <div class="float-right">
        <a href="#" onclick="markasread()">Mark All As Read</a>
    </div>
    </div>
    <div class="dropdown-list-content dropdown-list-icons">
        @foreach (auth()->user()->unreadNotifications as $notification)
        <div class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-danger text-white">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="dropdown-item-desc">
               <strong> {{ $notification->data['ruangan'] }} Dengan Peminjam {{ $notification->data['user'] }} Memiliki Status {{ $notification->data['message'] }} </strong>
            </div>
        </div>
        @endforeach
        @foreach (auth()->user()->readNotifications as $notif)
        <div class="dropdown-item">
            <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-envelope-open"></i>
            </div>
            <div class="dropdown-item-desc">
               {{ $notif->data['ruangan'] }} Dengan Peminjam {{ $notif->data['user'] }} Memiliki Status {{ $notif->data['message'] }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="dropdown-footer text-center">
        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
    </div>
</div>
