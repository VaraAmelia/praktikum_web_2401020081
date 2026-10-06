<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    @if (session('berhasil'))
        <p>{{ session('berhasil') }}</p>
    @endif

    @if (session('gagal'))
        <p>{{ session('gagal') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Tambah Mahasiswa</h2>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <p>
            <label for="nim">NIM</label><br>
            <input
                type="text"
                id="nim"
                name="nim"
                value="{{ old('nim') }}"
            >
        </p>

        <p>
            <label for="nama">Nama</label><br>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama') }}"
            >
        </p>

        <p>
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >
        </p>

        <p>
            <label for="usia">Usia</label><br>
            <input
                type="number"
                id="usia"
                name="usia"
                value="{{ old('usia') }}"
            >
        </p>

        <p>
            <label for="program_studi_id">Program Studi</label><br>
            <select id="program_studi_id" name="program_studi_id">
                <option value="">-- Pilih Program Studi --</option>

                @foreach ($daftarProgramStudi as $prodi)
                    <option
                        value="{{ $prodi['id'] }}"
                        {{ old('program_studi_id') == $prodi['id'] ? 'selected' : '' }}
                    >
                        {{ $prodi['nama_prodi'] }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Simpan</button>
    </form>

    <h2>Pencarian dan Filter</h2>

    <form action="{{ route('mahasiswa.index') }}" method="GET">
        <p>
            <label for="q">Kata Kunci</label><br>
            <input
                type="text"
                id="q"
                name="q"
                value="{{ $kataKunci }}"
                placeholder="Cari NIM, nama, atau email"
            >
        </p>

        <p>
            <label for="filter_program_studi_id">Program Studi</label><br>
            <select
                id="filter_program_studi_id"
                name="program_studi_id"
            >
                <option value="">-- Semua Program Studi --</option>

                @foreach ($daftarProgramStudi as $prodi)
                    <option
                        value="{{ $prodi['id'] }}"
                        @selected($programStudiId == $prodi['id'])
                    >
                        {{ $prodi['nama_prodi'] }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Cari / Filter</button>
        <a href="{{ route('mahasiswa.index') }}">Reset</a>
    </form>

    <h2>Daftar Mahasiswa</h2>

    <table border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Usia</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($daftarMahasiswa as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa['nim'] }}</td>
                    <td>{{ $mahasiswa['nama'] }}</td>
                    <td>{{ $mahasiswa['email'] }}</td>
                    <td>{{ $mahasiswa['usia'] }}</td>
                    <td>{{ $mahasiswa['nama_prodi'] }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa['id']) }}">
                            Ubah
                        </a>

                        <form
                            action="{{ route('mahasiswa.destroy', $mahasiswa['id']) }}"
                            method="POST"
                            style="display:inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Belum ada data mahasiswa.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>