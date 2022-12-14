
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
{{--            Admin Section--}}
            @if(Request::is('admin*'))
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Tag And Category</span>
                    </li>
                    <li>
                        <a href="{{route('admin.tag.index')}}"><i class="la la-tags"></i> <span>Tag</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.category.index')}}"><i class="fa fa-calendar-times-o"></i> <span>Category</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Posts</span>
                    </li>
                    <li>
                        <a href="{{route('admin.post.index')}}"><i class="fa fa-newspaper-o"></i> <span>All Post</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.pending')}}"><i class="fa fa-podcast"></i> <span>Pending Post</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Favorite Post</span>
                    </li>
                    <li>
                        <a href="{{route('admin.favorite')}}"><i class="fa fa-heart"></i> <span>Favorite Post</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Subscribers</span>
                    </li>
                    <li>
                        <a href="{{route('admin.subscriber.index')}}"><i class="fa fa-subscript"></i> <span>Subscribers</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Comment</span>
                    </li>
                    <li>
                        <a href="{{route('admin.comment.index')}}"><i class="fa fa-comment"></i> <span>Comment</span></a>
                    </li>
                    <li class="menu-title">
                        <span>All Authors</span>
                    </li>
                    <li>
                        <a href="{{route('admin.author.show')}}"><i class="fa fa-user-circle"></i> <span>All Author</span></a>
                    </li>
                </ul>
{{--                Author Section--}}
            @else
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Post</span>
                    </li>
                    <li>
                        <a href="{{route('author.post.index')}}"><i class="la la-book-dead"></i> <span>Post</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Favorite</span>
                    </li>
                    <li>
                        <a href="{{route('author.favorite')}}"><i class="fa fa-heart"></i> <span>Favorite</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Comments</span>
                    </li>
                    <li>
                        <a href="{{route('author.comment.index')}}"><i class="fa fa-comment"></i> <span>Comments</span></a>
                    </li>
                </ul>
            @endif


        </div>
    </div>
</div>
