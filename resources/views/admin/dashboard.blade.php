@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-layout">
    @include('admin.sidebar')
    
    <div class="main-content">
        <h2>Dashboard Overview</h2>
        <p class="text-muted mb-4">Monitor your library statistics.</p>
        
        <div class="flex gap-2 mb-4">
            <div class="glass glass-panel" style="flex: 1; text-align: center;">
                <h3 style="font-size: 2.5rem; color: var(--primary);">{{ $totalBooks }}</h3>
                <p class="text-muted">Total Books</p>
            </div>
            <div class="glass glass-panel" style="flex: 1; text-align: center;">
                <h3 style="font-size: 2.5rem; color: var(--secondary);">{{ $totalUsers }}</h3>
                <p class="text-muted">Total Users</p>
            </div>
            <div class="glass glass-panel" style="flex: 1; text-align: center;">
                <h3 style="font-size: 2.5rem; color: #10b981;">{{ $totalViews }}</h3>
                <p class="text-muted">Total Book Views</p>
            </div>
        </div>
        
        <div class="glass glass-panel chart-container">
            <canvas id="booksChart"></canvas>
        </div>
        
        <h3 class="mt-4 mb-4">Recent Users</h3>
        <div class="glass glass-panel table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge badge-{{ $user->role }}">{{ ucfirst($user->role) }}</span>
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('booksChart').getContext('2d');
        const chartData = @json($chartData);
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Book Views',
                    data: chartData.data,
                    backgroundColor: 'rgba(99, 102, 241, 0.5)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: '#cbd5e1'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#cbd5e1'
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
