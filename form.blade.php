<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block text-sm font-medium mb-1 text-slate-700">Name *</label>
        <input type="text" name="name"
               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
               value="{{ old('name', $lead->name ?? '') }}">
        @error('name')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-slate-700">Email *</label>
        <input type="email" name="email"
               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
               value="{{ old('email', $lead->email ?? '') }}">
        @error('email')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-slate-700">Phone</label>
        <input type="text" name="phone"
               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
               value="{{ old('phone', $lead->phone ?? '') }}">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-slate-700">Status</label>
        <select name="status"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
            @foreach(['new','contacted','closed'] as $status)
                <option value="{{ $status }}"
                    {{ old('status', $lead->status ?? '') == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>

</div>
