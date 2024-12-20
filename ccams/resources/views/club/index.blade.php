<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2 class="text-start">Terokai Kelab</h2>
        <h2 class="text-center mb-4">Jenis Kelab</h2>
        <div class="row g-4 mt-0">
            <!-- Club Type 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <img src="{{ asset('images/persatuan.jpg') }}" alt="Kelab" class="card-img-top p-0">
                    <div class="card-body text-center">
                        <h4 class="card-title">Kelab</h4>
                        <a href="{{ route('club.kelab') }}" class="btn btn-dark mt-2">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <!-- Club Type 2 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Sukan" class="card-img-top p-0">
                    <div class="card-body text-center">
                        <h4 class="card-title">Sukan</h4>
                        <a href="{{ route('club.sukan') }}" class="btn btn-dark mt-2">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <!-- Club Type 3 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Unit Beruniform" class="card-img-top p-0">
                    <div class="card-body text-center">
                        <h4 class="card-title">Unit Beruniform</h4>
                        <a href="{{ route('club.unitberuniform') }}" class="btn btn-dark mt-2">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
