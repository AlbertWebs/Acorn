@extends('layouts.admin')

@section('title','Admin Dashboard')
@section('page-title','Dashboard')

@section('content')

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Bookings line chart
  const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
  new Chart(bookingsCtx, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul'],
      datasets: [{
        label: 'Bookings',
        data: [3, 7, 4, 6, 8, 10, 7],
        borderColor: '#6366F1',
        backgroundColor: 'rgba(99, 102, 241, 0.2)',
        tension: 0.4,
        fill: true
      }]
    }
  });

  // Cars pie chart
  const carsCtx = document.getElementById('carsChart').getContext('2d');
  new Chart(carsCtx, {
    type: 'doughnut',
    data: {
      labels: ['SUV', 'Sedan', 'Truck', 'Other'],
      datasets: [{
        label: 'Cars',
        data: [5, 3, 2, 2],
        backgroundColor: ['#34D399', '#60A5FA', '#FBBF24', '#F87171']
      }]
    },
    options: {
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
</script>
@endpush
