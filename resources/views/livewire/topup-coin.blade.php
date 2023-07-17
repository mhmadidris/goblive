<div>
    <div class="radio-group row justify-content-between gap-2 text-center a" style="margin-bottom: 10rem;">
        @foreach ($paket as $itemPaket)
            <div class="col-auto ml-sm-2 mx-1 card-block py-0 text-center radio {{ $idPaket == $itemPaket->id ? 'selected' : '' }}"
                wire:click="$set('idPaket', '{{ $itemPaket->id }}')">
                <div>
                    <h1 class="fw-bold">{{ number_format($itemPaket->coin) }}</h1>
                    <h4 class="fw-semibold">{{ $itemPaket->nama_paket }}</h4>
                    <h5 class="fw-medium">{{ 'Rp. ' . number_format($itemPaket->harga) }}</h5>
                </div>
            </div>
        @endforeach
    </div>

    <div class="fixed-bottom card card-body rounded-0 w-100 mt-2">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="d-flex flex-column text-black">
                <input type="hidden" value="{{ $idPaket ? $idPaket : '-' }}" name="idPaket" />

                <h5>Package: {{ $idPaket ? $paket->firstWhere('id', $idPaket)->nama_paket : '-' }}</h5>
                <h5 class="m-0 fw-bold">Price:
                    {{ $idPaket ? 'Rp. ' . number_format($paket->firstWhere('id', $idPaket)->harga) : '-' }}</h5>
            </div>
            <button type="submit" class="btn btn-primary rounded">Topup</button>
        </div>
    </div>
</div>
