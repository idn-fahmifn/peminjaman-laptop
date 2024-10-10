<ul>
    <li class="menu-title">Main</li>
    <li>
        <a href="{{route('home')}}" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> Dashboard <span class="badge badge-pill badge-primary float-right">7</span></span>
        </a>
    </li>
    <li>
        <a href="{{route('students.index')}}" class="waves-effect"><i class="fas fa-graduation-cap"></i><span> Data Siswa </span></a>
    </li>
    <li>
        <a href="{{route('grades.index')}}" class="waves-effect"><i class="fas fa-school"></i><span> Data Kelas </span></a>
    </li>
    <li>
        <a href="{{route('borrow.index')}}" class="waves-effect"><i class="fas fa-laptop"></i><span> Pemijaman </span></a>
    </li>
</ul>