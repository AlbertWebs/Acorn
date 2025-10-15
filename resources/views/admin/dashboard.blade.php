@extends('layouts.admin')

@section('title','Admin Dashboard')
@section('page-title','Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-lg font-semibold mb-4">Daily Visits</h3>
    <canvas id="trafficChart"></canvas>
  </div>

  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-lg font-semibold mb-4">Devices</h3>
    <canvas id="deviceChart"></canvas>
  </div>

  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-lg font-semibold mb-4">Browsers</h3>
    <canvas id="browserChart"></canvas>
  </div>

  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-lg font-semibold mb-4">Top Pages</h3>
    <canvas id="pageChart"></canvas>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const visitsData = {!! json_encode(array_values($visitsPerDay->toArray())) !!};
  const visitsLabels = {!! json_encode(array_keys($visitsPerDay->toArray())) !!};
  const devicesData = {!! json_encode(array_values($devices->toArray())) !!};
  const devicesLabels = {!! json_encode(array_keys($devices->toArray())) !!};
  const browsersData = {!! json_encode(array_values($browsers->toArray())) !!};
  const browsersLabels = {!! json_encode(array_keys($browsers->toArray())) !!};
  const pagesData = {!! json_encode(array_values($pages->toArray())) !!};
  const pagesLabels = {!! json_encode(array_keys($pages->toArray())) !!};

  new Chart(document.getElementById('trafficChart'), {
    type: 'line',
    data: { labels: visitsLabels, datasets: [{ label: 'Visits', data: visitsData, borderColor: '#6366F1', backgroundColor: 'rgba(99,102,241,0.3)', fill: true, tension: 0.4 }] }
  });

  new Chart(document.getElementById('deviceChart'), {
    type: 'doughnut',
    data: { labels: devicesLabels, datasets: [{ data: devicesData, backgroundColor: ['#34D399', '#60A5FA', '#FBBF24'] }] }
  });

  new Chart(document.getElementById('browserChart'), {
    type: 'pie',
    data: { labels: browsersLabels, datasets: [{ data: browsersData, backgroundColor: ['#F87171', '#FBBF24', '#60A5FA', '#34D399'] }] }
  });

  new Chart(document.getElementById('pageChart'), {
    type: 'bar',
    data: { labels: pagesLabels, datasets: [{ label: 'Page Views', data: pagesData, backgroundColor: '#6366F1' }] }
  });
</script>
@endpush
