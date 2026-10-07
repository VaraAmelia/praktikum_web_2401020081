<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>

    <h1>Ubah Data Mahasiswa</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form
        action="{{ route('mahasiswa.update', $mahasiswa['id']) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <p>
            <label for="nim">NIM</label><br>
            <input
                type="text"
                id="nim"
                name="nim"
                value="{{ old('nim', $mahasiswa['nim']) }}"
            >
        </p>

        <p>
            <label for="nama">Nama</label><br>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama', $mahasiswa['nama']) }}"
            >
        </p>

        <p>
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $mahasiswa['email']) }}"
            >
        </p>

        <p>
            <label for="usia">Usia</label><br>
            <input
                type="number"
                id="usia"
                name="usia"
                value="{{ old('usia', $mahasiswa['usia']) }}"
            >
        </p>

        <p>
            <label for="program_studi_id">Program Studi</label><br>
            <select id="program_studi_id" name="program_studi_id">
                <option value="">-- Pilih Program Studi --</option>

                @foreach ($daftarProgramStudi as $prodi)
                    <option
                        value="{{ $prodi['id'] }}"
                        @selected(
                            old(
                                'program_studi_id',
                                $mahasiswa['program_studi_id']
                            ) == $prodi['id']
                        )
                    >
                        {{ $prodi['nama_prodi'] }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p>
        <a href="{{ route('mahasiswa.index') }}">
            Kembali ke Data Mahasiswa
        </a>
    </p>

</body>
</html>