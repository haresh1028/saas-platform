@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 text-dark fw-bold">
                                <i class="fas fa-clipboard-list me-2 text-primary"></i>
                                Audit Logs
                            </h4>
                            <small class="text-muted">Track all system activities and changes</small>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                                <i class="fas fa-filter me-1"></i>Filters
                            </button>
                            <button class="btn btn-outline-primary btn-sm" onclick="window.location.reload()">
                                <i class="fas fa-sync-alt me-1"></i>Refresh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="collapse" id="filterCollapse">
                    <div class="card-body border-bottom bg-light">
                        <form method="GET" class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">User</label>
                                <input type="text" class="form-control form-control-sm" name="user" placeholder="Search by user..." value="{{ request('user') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">Action</label>
                                <select class="form-select form-select-sm" name="action">
                                    <option value="">All Actions</option>
                                    <option value="created" {{ request('action') == 'created' ? 'selected' : '' }}>Created</option>
                                    <option value="updated" {{ request('action') == 'updated' ? 'selected' : '' }}>Updated</option>
                                    <option value="deleted" {{ request('action') == 'deleted' ? 'selected' : '' }}>Deleted</option>
                                    <option value="login" {{ request('action') == 'login' ? 'selected' : '' }}>Login</option>
                                    <option value="logout" {{ request('action') == 'logout' ? 'selected' : '' }}>Logout</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">Date Range</label>
                                <input type="date" class="form-control form-control-sm" name="date_from" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-semibold">&nbsp;</label>
                                <div class="d-flex gap-2">
                                    <input type="date" class="form-control form-control-sm" name="date_to" value="{{ request('date_to') }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                                    <a href="{{ url()->current() }}" class="btn btn-light btn-sm">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">
                                        <i class="fas fa-user me-1"></i>User
                                    </th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">
                                        <i class="fas fa-bolt me-1"></i>Action
                                    </th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">
                                        <i class="fas fa-info-circle me-1"></i>Description
                                    </th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase d-none d-lg-table-cell">
                                        <i class="fas fa-history me-1"></i>Changes
                                    </th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase d-none d-md-table-cell">
                                        <i class="fas fa-map-marker-alt me-1"></i>IP
                                    </th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">
                                        <i class="fas fa-clock me-1"></i>Time
                                    </th>
                                    <th class="border-0 fw-semibold text-muted small text-uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                    <tr class="align-middle">
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    @if($log->user)
                                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 12px;">
                                                            {{ substr($log->user->name, 0, 2) }}
                                                        </div>
                                                    @else
                                                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-size: 12px;">
                                                            <i class="fas fa-cog"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-medium text-dark">{{ $log->user?->name ?? 'System' }}</div>
                                                    @if($log->user?->email)
                                                        <small class="text-muted">{{ $log->user->email }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            @php
                                                $actionClasses = [
                                                    'created' => 'success',
                                                    'updated' => 'warning',
                                                    'deleted' => 'danger',
                                                    'login' => 'info',
                                                    'logout' => 'secondary'
                                                ];
                                                $actionIcons = [
                                                    'created' => 'plus',
                                                    'updated' => 'edit',
                                                    'deleted' => 'trash',
                                                    'login' => 'sign-in-alt',
                                                    'logout' => 'sign-out-alt'
                                                ];
                                                $badgeClass = $actionClasses[strtolower($log->action)] ?? 'primary';
                                                $icon = $actionIcons[strtolower($log->action)] ?? 'bolt';
                                            @endphp
                                            <span class="badge bg-{{ $badgeClass }} d-inline-flex align-items-center">
                                                <i class="fas fa-{{ $icon }} me-1" style="font-size: 10px;"></i>
                                                {{ ucfirst($log->action) }}
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            <div class="text-dark">{{ $log->description }}</div>
                                        </td>
                                        <td class="py-3 d-none d-lg-table-cell">
                                            @if($log->old_values || $log->new_values)
                                                <button class="btn btn-outline-secondary btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#changesModal{{ $log->id }}">
                                                    <i class="fas fa-eye me-1"></i>View Changes
                                                </button>
                                            @else
                                                <span class="text-muted small">No changes</span>
                                            @endif
                                        </td>
                                        <td class="py-3 d-none d-md-table-cell">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-globe me-2 text-muted"></i>
                                                <code class="small">{{ $log->ip_address }}</code>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="text-dark">{{ $log->created_at->format('M d, Y') }}</div>
                                            <small class="text-muted">{{ $log->created_at->format('H:i:s') }}</small>
                                        </td>
                                        <td class="py-3">
                                            <div class="dropdown">
                                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <button class="dropdown-item" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#detailsModal{{ $log->id }}">
                                                            <i class="fas fa-info-circle me-2"></i>View Details
                                                        </button>
                                                    </li>
                                                    @if($log->old_values || $log->new_values)
                                                        <li>
                                                            <button class="dropdown-item" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#changesModal{{ $log->id }}">
                                                                <i class="fas fa-history me-2"></i>View Changes
                                                            </button>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Details Modal -->
                                    <div class="modal fade" id="detailsModal{{ $log->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        <i class="fas fa-info-circle me-2"></i>
                                                        Audit Log Details
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <strong>User:</strong>
                                                            <p class="mb-0">{{ $log->user?->name ?? 'System' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>Action:</strong>
                                                            <p class="mb-0">
                                                                <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($log->action) }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-12">
                                                            <strong>Description:</strong>
                                                            <p class="mb-0">{{ $log->description }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>IP Address:</strong>
                                                            <p class="mb-0"><code>{{ $log->ip_address }}</code></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>Timestamp:</strong>
                                                            <p class="mb-0">{{ $log->created_at->format('M d, Y H:i:s') }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <strong>User Agent:</strong>
                                                            <p class="mb-0 small text-muted">{{ $log->user_agent }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Changes Modal -->
                                    @if($log->old_values || $log->new_values)
                                        <div class="modal fade" id="changesModal{{ $log->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            <i class="fas fa-history me-2"></i>
                                                            Data Changes
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @if($log->old_values)
                                                                <div class="col-md-6">
                                                                    <h6 class="text-danger">
                                                                        <i class="fas fa-minus-circle me-1"></i>
                                                                        Old Values
                                                                    </h6>
                                                                    <pre class="bg-light p-3 rounded small"><code>{{ json_encode($log->old_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</code></pre>
                                                                </div>
                                                            @endif
                                                            @if($log->new_values)
                                                                <div class="col-md-6">
                                                                    <h6 class="text-success">
                                                                        <i class="fas fa-plus-circle me-1"></i>
                                                                        New Values
                                                                    </h6>
                                                                    <pre class="bg-light p-3 rounded small"><code>{{ json_encode($log->new_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</code></pre>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-clipboard-list fa-3x mb-3 opacity-25"></i>
                                                <h5>No audit logs found</h5>
                                                <p>There are no audit logs to display at the moment.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if($logs->hasPages())
                    <div class="card-footer bg-white border-top">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                            <div class="text-muted small">
                                <i class="fas fa-info-circle me-1"></i>
                                Showing <span class="fw-semibold">{{ $logs->firstItem() }}</span> to <span class="fw-semibold">{{ $logs->lastItem() }}</span> of <span class="fw-semibold">{{ $logs->total() }}</span> results
                            </div>
                            <div class="pagination-wrapper">
                                {{ $logs->appends(request()->query())->links('partials.pagination') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.table th {
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem 0.75rem;
}

.table td {
    padding: 0.75rem;
    vertical-align: middle;
}

.avatar-sm {
    flex-shrink: 0;
}

.badge {
    font-size: 0.7rem;
    font-weight: 500;
}

.modal pre {
    max-height: 400px;
    overflow-y: auto;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}

/* Custom Pagination Styles */
.pagination-wrapper .pagination {
    margin: 0;
    gap: 4px;
}

.pagination-wrapper .page-link {
    border: 1px solid #dee2e6;
    color: #6c757d;
    padding: 0.5rem 0.75rem;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.15s ease-in-out;
    margin: 0 2px;
}

.pagination-wrapper .page-link:hover {
    color: #0d6efd;
    background-color: #e7f1ff;
    border-color: #0d6efd;
    transform: translateY(-1px);
}

.pagination-wrapper .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
    box-shadow: 0 2px 4px rgba(13, 110, 253, 0.25);
}

.pagination-wrapper .page-item.disabled .page-link {
    color: #adb5bd;
    background-color: #f8f9fa;
    border-color: #dee2e6;
    cursor: not-allowed;
}

.pagination-wrapper .page-item:first-child .page-link,
.pagination-wrapper .page-item:last-child .page-link {
    border-radius: 0.375rem;
}

/* Custom pagination info */
.pagination-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.pagination-info select {
    width: auto;
    min-width: 80px;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .avatar-sm {
        display: none;
    }
    
    .pagination-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    
    .pagination-wrapper .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .pagination-wrapper .page-link {
        padding: 0.375rem 0.625rem;
        font-size: 0.75rem;
        margin: 1px;
    }
}

@media (max-width: 576px) {
    .pagination-wrapper .page-link {
        padding: 0.25rem 0.5rem;
        font-size: 0.7rem;
    }
    
    /* Hide page numbers on very small screens, show only prev/next */
    .pagination-wrapper .page-item:not(.disabled):not(.active) .page-link {
        display: none;
    }
    
    .pagination-wrapper .page-item.active .page-link,
    .pagination-wrapper .page-item.disabled .page-link,
    .pagination-wrapper .page-item:first-child .page-link,
    .pagination-wrapper .page-item:last-child .page-link {
        display: block;
    }
}
</style>
@endsection