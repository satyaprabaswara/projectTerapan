<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .upload-wrapper{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .upload-card{
            width: 100%;
            max-width: 1000px;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,.08);
        }

        .left-side{
            padding: 60px;
        }

        .title{
            font-size: 40px;
            font-weight: 700;
            color: #0f172a;
        }

        .subtitle{
            color: #64748b;
            margin-bottom: 35px;
        }

        .form-control{
            height: 55px;
            border-radius: 15px;
            border: 1px solid #dbe2ea;
        }

        .form-control:focus{
            box-shadow: none;
            border-color: #2563eb;
        }

        .upload-file{
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            padding: 50px 20px;
            text-align: center;
            transition: .3s;
            background: #f8fafc;
        }

        .upload-file:hover{
            border-color: #2563eb;
            background: #eff6ff;
        }

        .upload-file input{
            margin-top: 20px;
        }

        .btn-upload{
            width: 100%;
            height: 55px;
            border-radius: 15px;
            border: none;
            font-size: 18px;
            font-weight: 600;
            background: linear-gradient(135deg,#2563eb,#3b82f6);
            transition: .3s;
        }

        .btn-upload:hover{
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37,99,235,.25);
        }

        .right-side{
            background:
            linear-gradient(
                135deg,
                #dbeafe,
                #f0fdf4
            );

            display:flex;
            justify-content:center;
            align-items:center;
            text-align:center;
            padding:40px;
        }

        .preview-logo{
            width: 150px;
            margin-bottom: 20px;
        }

        .company-name{
            font-size: 42px;
            font-weight: 700;
            color: #1e293b;
        }

        .company-desc{
            font-size: 22px;
            color: #475569;
        }

        @media(max-width:991px){
            .left-side{
                padding:40px;
            }

            .title{
                font-size:32px;
            }

            .company-name{
                font-size:30px;
            }

            .company-desc{
                font-size:18px;
            }

            

            
        }
    </style>
</head>
<body>

<div class="upload-wrapper">

    <div class="upload-card">

        <div class="row g-0">

            {{-- LEFT --}}
            <div class="col-lg-6 left-side">

                <h1 class="title">
                    Upload Dokumen 
                </h1>

                <p class="subtitle">
                    Upload dan simpan dokumen perusahaan dengan aman
                </p>

                <form
                    action="/dokumen"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Nama Dokumen
                        </label>

                        <input
                            type="text"
                            name="nama_dokumen"
                            class="form-control"
                            placeholder="Masukkan nama dokumen..."
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Upload File
                        </label>

                        <div class="upload-file">

                            <h4>📂 Pilih File</h4>

                            <p class="text-muted">
                                Upload dokumen PDF, DOC, XLS, atau file lainnya
                            </p>

                            <input
                                type="file"
                                name="file"
                             required>

                        </div>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary btn-upload">

                        ⬆ Upload Dokumen
                    </button>

                </form>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-6 right-side">

                <div>

                    <img
                        src="{{ asset('images/logo.png') }}"
                        class="preview-logo"
                        alt="Logo">

                    <h2 class="company-name">
                        PT SPR Langgak
                    </h2>

                    <p class="company-desc">
                        Sistem Dokumen Digitalisasi Divisi Finance
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>