<div class="mb-3">
    <label class="form-label">Plan Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $plan->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Price ($)</label>
    <input type="number" name="price" step="0.01" min="0"
           class="form-control @error('price') is-invalid @enderror"
           value="{{ old('price', $plan->price ?? 0) }}" required>
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check mb-4">
    <input type="checkbox" name="is_active" class="form-check-input" id="activeCheck"
        {{ old('is_active', $plan->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="activeCheck">Active</label>
</div>

<button type="submit" class="btn btn-success">
    <i class="bi bi-save"></i> Save Plan
</button>
<a href="{{ route('admin.plans.index') }}" class="btn btn-secondary">Cancel</a>
