<div class="col-md-12">
    @if (session()->get('success'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">

            <strong>Success - </strong> {{ session()->get('success') }}
        </div>
    @elseif (session()->get('danger'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">

            <strong>Error - </strong> {{ session()->get('danger') }}
        </div>
    @elseif (session()->get('info'))
        <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">

            <strong>Info - </strong> {{ session()->get('info') }}
        </div>
    @endif

</div>
