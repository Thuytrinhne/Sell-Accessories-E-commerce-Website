<div class="container_list">
            <ul class="list_item">
                <li class="list_choice"><a href="{{route('admin.dashboard')}}"  class="dashboard">
                        <ion-icon name="home-sharp"></ion-icon>
                        Bảng điều khiển
                    </a></li>
                    <li class="list_choice"><a href="{{route('admin.category')}}" class="category">
                        <ion-icon name="pricetags"></ion-icon>
                        Danh sách thể loại
                    </a></li>
                <li class="list_choice"><a href="{{ route('admin.product') }}" class="product">
                        <ion-icon name="bag"></ion-icon>
                        Sản phẩm
                    </a>
                </li>
                <li class="list_choice"><a href="{{route('admin.order')}}" class="order">
                        <ion-icon name="cart"></ion-icon>
                        Đơn hàng
                    </a></li>

                <li class="list_choice"><a href="{{route('admin.report')}}" class="report">
                        <ion-icon name="bar-chart"></ion-icon> Thống kê
                    </a></li>
                <li class="list_choice"><a href="{{route('admin.account')}}" class="manage">
                        <ion-icon name="people"></ion-icon> Quản lý tài khoản
                    </a></li>
            </ul>
</div>