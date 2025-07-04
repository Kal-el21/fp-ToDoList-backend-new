@extends('layouts.app')

@section('content')

<div class="body flex-grow-1">
  <div class="container-lg px-4">
    <div class="row g-4 mb-4">
      {{-- <div class="col-sm-6 col-xl-3">
        <div class="card text-white bg-primary">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                  </svg>)</span></div>
              <div>Users</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart1" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-xl-3">
        <div class="card text-white bg-info">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                  </svg>)</span></div>
              <div>Income</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart2" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-xl-3">
        <div class="card text-white bg-warning">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                  </svg>)</span></div>
              <div>Conversion Rate</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3" style="height:70px;">
            <canvas class="chart" id="card-chart3" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-xl-3">
        <div class="card text-white bg-danger">
          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                  </svg>)</span></div>
              <div>Sessions</div>
            </div>
            <div class="dropdown">
              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart4" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h4 class="card-title mb-0">Traffic</h4>
            <div class="small text-body-secondary">January - July 2023</div>
          </div>
          <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
            <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
              <input class="btn-check" id="option1" type="radio" name="options" autocomplete="off">
              <label class="btn btn-outline-secondary"> Day</label>
              <input class="btn-check" id="option2" type="radio" name="options" autocomplete="off" checked="">
              <label class="btn btn-outline-secondary active"> Month</label>
              <input class="btn-check" id="option3" type="radio" name="options" autocomplete="off">
              <label class="btn btn-outline-secondary"> Year</label>
            </div>
            <button class="btn btn-primary" type="button">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
              </svg>
            </button>
          </div>
        </div>
        <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
          <canvas class="chart" id="main-chart" height="300"></canvas>
        </div>
      </div>
      <div class="card-footer">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-4 mb-2 text-center">
          <div class="col">
            <div class="text-body-secondary">Visits</div>
            <div class="fw-semibold text-truncate">29.703 Users (40%)</div>
            <div class="progress progress-thin mt-2">
              <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="col">
            <div class="text-body-secondary">Unique</div>
            <div class="fw-semibold text-truncate">24.093 Users (20%)</div>
            <div class="progress progress-thin mt-2">
              <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="col">
            <div class="text-body-secondary">Pageviews</div>
            <div class="fw-semibold text-truncate">78.706 Views (60%)</div>
            <div class="progress progress-thin mt-2">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="col">
            <div class="text-body-secondary">New Users</div>
            <div class="fw-semibold text-truncate">22.123 Users (80%)</div>
            <div class="progress progress-thin mt-2">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="col d-none d-xl-block">
            <div class="text-body-secondary">Bounce Rate</div>
            <div class="fw-semibold text-truncate">40.15%</div>
            <div class="progress progress-thin mt-2">
              <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-->
    <div class="row g-4 mb-4">
      <div class="col-sm-6 col-lg-4">
        <div class="card" style="--cui-card-cap-bg: #3b5998">
          <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
              <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-facebook-f"></use>
            </svg>
            <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
              <canvas id="social-box-chart-1" height="90"></canvas>
            </div>
          </div>
          <div class="card-body row text-center">
            <div class="col">
              <div class="fs-5 fw-semibold">89k</div>
              <div class="text-uppercase text-body-secondary small">friends</div>
            </div>
            <div class="vr"></div>
            <div class="col">
              <div class="fs-5 fw-semibold">459</div>
              <div class="text-uppercase text-body-secondary small">feeds</div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-lg-4">
        <div class="card" style="--cui-card-cap-bg: #00aced">
          <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
              <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-twitter"></use>
            </svg>
            <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
              <canvas id="social-box-chart-2" height="90"></canvas>
            </div>
          </div>
          <div class="card-body row text-center">
            <div class="col">
              <div class="fs-5 fw-semibold">973k</div>
              <div class="text-uppercase text-body-secondary small">followers</div>
            </div>
            <div class="vr"></div>
            <div class="col">
              <div class="fs-5 fw-semibold">1.792</div>
              <div class="text-uppercase text-body-secondary small">tweets</div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
      <div class="col-sm-6 col-lg-4">
        <div class="card" style="--cui-card-cap-bg: #4875b4">
          <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
              <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-linkedin"></use>
            </svg>
            <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
              <canvas id="social-box-chart-3" height="90"></canvas>
            </div>
          </div>
          <div class="card-body row text-center">
            <div class="col">
              <div class="fs-5 fw-semibold">500+</div>
              <div class="text-uppercase text-body-secondary small">contacts</div>
            </div>
            <div class="vr"></div>
            <div class="col">
              <div class="fs-5 fw-semibold">292</div>
              <div class="text-uppercase text-body-secondary small">feeds</div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div> --}}
    <!-- /.row-->
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">Perkembangan Task Selama 30 Hari</div>
          <div class="card-body">
            <canvas id="taskChart" height="100"></canvas>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
    <!-- /.row-->
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">Traffic &amp; Sales</div>
          <div class="card-body">
            @if ($users->count())
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Jumlah Task</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->tasks_count }}</td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-muted">Belum ada pengguna terdaftar.</p>
            @endif
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
  </div>
</div>

@endsection
@section('script')

<script>
    const ctx = document.getElementById('taskChart').getContext('2d');
    const taskChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($taskChartLabels),
            datasets: [{
                label: 'Jumlah Task',
                data: @json($taskChartData),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        autoSkip: true,
                        maxTicksLimit: 10
                    }
                },
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
@endsection
