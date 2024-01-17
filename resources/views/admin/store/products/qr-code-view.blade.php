<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Qr Codes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>{{ $product->name }} <small>( {{ $product->sku }} )</small></h4>
                
            </div>
            <div class="card-body">
                <div class="row g-4">
                @foreach ($product->qr_code_files as $file)
                        <div class="col text-center">
                            <img src="{{ asset($file) }}" width="150px"/>
                        
                            <div class="mt-2"><b>{{ str()->afterLast(str()->beforeLast($file, '.svg'), '/') }}</b></div>
                            
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</body>
</html>