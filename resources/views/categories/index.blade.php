<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>
</head>
<body style="font-family: Arial; margin: 30px;">

    <h1>Data Kategori</h1>

    <a href="{{ route('home') }}">
        Kembali ke Dashboard
    </a>

    <br><br>

    <a href="{{ route('categories.create') }}">
        + Tambah Kategori
    </a>

    <br><br>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr bgcolor="#dddddd">
            <th width="50">ID</th>
            <th>Nama Kategori</th>
            <th width="150">Aksi</th>
        </tr>

        @forelse ($categories as $category)
            <tr>
                <td align="center">{{ $category->id }}</td>
                <td>{{ $category->nama }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">
                        Edit
                    </a>

                    |

                    <form
                        action="{{ route('categories.destroy', $category->id) }}"
                        method="POST"
                        style="display: inline;"
                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
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
                <td colspan="3" align="center">Belum ada data kategori.</td>
            </tr>
        @endforelse
    </table>

</body>
</html>
