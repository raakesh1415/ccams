<x-layout>
    <div class="container-fluid">
        <div class="text-center pb-4">
            <h2 class="text-center"><b>TEROKAI KELAB</b></h2>
            <h4 class="text-start pt-4"><b>Jenis Kelab</b></h4>
            <div class="row g-4 mt-0">
                <!-- Club Type 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card club-card">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('images/persatuan.jpg') }}" alt="Persatuan" class="card-img-top p-0">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Persatuan</h4>
                            <a href="{{ route('club.kelab') }}" class="btn btn-dark mt-2">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <!-- Club Type 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card club-card">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Sukan" class="card-img-top p-0">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Sukan</h4>
                            <a href="{{ route('club.sukan') }}" class="btn btn-dark mt-2">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <!-- Club Type 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card club-card">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Unit Beruniform"
                                class="card-img-top p-0">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Unit Beruniform</h4>
                            <a href="{{ route('club.unitberuniform') }}" class="btn btn-dark mt-2">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
