<!-- column1, Vertical Dropdown Menu -->
<div id="main-menu" class="list-group">
    <a href="" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý nhà
        hàng <span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="nhahang">
        <a href="{{route('restaurant.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách nhà hàng </a>
        <a href="{{route('restaurant.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới nhà hàng</a>
    </div>
    <a href="#thanhvien" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý
        thành viên <span class="caret"></span></a>
    <div class="collapseshow show list-group-level1" id="thanhvien">
        <a href="{{route('user.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách thành viên </a>
        <a href="{{route('user.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới thành viên </a>
    </div>
    <a href="#nguyenlieu" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý
        nguyên liệu <span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="nghuyenlieu">
        <a href="{{route('material.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách nguyên liệu </a>
        <a href="{{route('material.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới nguyên liệu </a>
    </div>
    <a href="#order" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý Order
        <span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="order">
        <a href="{{route('order.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách Order </a>
        <a href="{{route('order.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới Order </a>
    </div>
    <a href="#menu" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý menu
        <span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="menu">
        <a href="{{route('menu.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách menu </a>
        <a href="{{route('menu.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới menu </a>
    </div>
    <a href="#menu" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý bàn
        <span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="menu">
        <a href="{{route('table.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách table </a>
        <a href="{{route('table.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới table </a>
    </div>
</div>

