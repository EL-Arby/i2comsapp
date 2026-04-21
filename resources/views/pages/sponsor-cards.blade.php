@foreach ($sponsors as $sponsor)
    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        @if ($sponsor->logo_url)
            <div class="h-40 bg-gray-100 flex items-center justify-center overflow-hidden">
                <img src="{{ asset($sponsor->logo_url) }}" alt="{{ $sponsor->name }}" class="max-h-40 max-w-full object-contain p-4">
            </div>
        @endif
        
        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $sponsor->name }}</h3>
            
            @if ($sponsor->description)
                <p class="text-gray-600 text-sm mb-4">{{ $sponsor->description }}</p>
            @endif
            
            <div class="flex flex-col gap-2 mt-6 pt-4 border-t">
                @if ($sponsor->website)
                    <a href="{{ $sponsor->website }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline font-semibold">
                        🌐 Visit Website
                    </a>
                @endif
                
                @if ($sponsor->contact_email)
                    <a href="mailto:{{ $sponsor->contact_email }}" class="text-blue-600 hover:underline text-sm">
                        ✉️ {{ $sponsor->contact_email }}
                    </a>
                @endif
                
                @if ($sponsor->contact_person)
                    <p class="text-gray-600 text-sm">Contact: {{ $sponsor->contact_person }}</p>
                @endif
            </div>
        </div>
    </div>
@endforeach
