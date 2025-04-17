@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white vh-100">
            <div class="position-sticky pt-3">
                <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
                <ul class="nav flex-column" id="sidebarMenu">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#" onclick="showSection('calculator')">
                            <i class="bi bi-calculator"></i> Calculator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" onclick="showSection('workouts')">
                            <i class="bi bi-dumbbell"></i> Workouts
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content Area -->
        <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
            </div>

            <!-- Calculator Section -->
            <div id="section-calculator" class="admin-section">
                <h4>All Food</h4>
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Protein</th>
                            <th>Carbs</th>
                            <th>Fats</th>
                            <th>Calories</th>
                            <th>Actions</th>
                            <th>Edit Food</th>
                            <th>Delete Food</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($calculators as $calculator)
                            <tr>
                                <td>{{ $calculator->id }}</td>
                                <td>{{ $calculator->name }}</td>
                                <td>{{ $calculator->protein }}</td>
                                <td>{{ $calculator->carbs }}</td>
                                <td>{{ $calculator->fats }}</td>
                                <td>{{ $calculator->calories }}</td>
                                <td>
                                    <form action="{{ route('admin.calculators.destroy', $calculator->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>

        
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>

            <!-- Workouts Section -->
            <div id="section-workouts" class="admin-section d-none">
                <h4>All Workouts</h4>
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Muscle Group</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th>Actions</th>
                            <th>Edit Workout</th>
                            <th>Delete Workout</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($workouts as $workout)
                            <tr>
                                <td>{{ $workout->id }}</td>
                                <td>{{ $workout->name }}</td>
                                <td>{{ $workout->muscle_group }}</td>
                                <td>{{ $workout->level }}</td>
                                <td>{{ $workout->description }}</td>
                                <td>
                                    <form action="{{ route('admin.workouts.destroy', $workout->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </main>
    </div>
</div>

<script>
    function showSection(section) {
        const sections = document.querySelectorAll('.admin-section');
        sections.forEach(s => s.classList.add('d-none'));

        const target = document.getElementById(`section-${section}`);
        if (target) {
            target.classList.remove('d-none');
        }

        document.querySelectorAll('#sidebarMenu .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        const activeLink = document.querySelector(`#sidebarMenu .nav-link[onclick="showSection('${section}')"]`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }
</script>

<style>
    #sidebarMenu .nav-link {
        transition: background-color 0.3s ease;
    }

    #sidebarMenu .nav-link:hover {
        background-color: #495057;
        color: #ffffff;
    }

    #sidebarMenu .nav-link.active {
        background-color: #343a40;
    }
</style>
@endsection
