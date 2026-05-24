@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="display: flex; gap: 0.5rem; align-items: center; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="glass disabled" style="padding: 0.75rem 1.5rem; border-radius: 12px; opacity: 0.5; cursor: not-allowed; color: var(--text-muted); font-weight: 600; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                Kembali
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="glass" style="padding: 0.75rem 1.5rem; border-radius: 12px; color: var(--text-main); text-decoration: none; font-weight: 600; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                Kembali
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div style="display: flex; gap: 0.5rem;">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="glass disabled" style="padding: 0.75rem 1.2rem; border-radius: 12px; color: var(--text-muted); font-weight: 600; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="glass active" aria-current="page" style="padding: 0.75rem 1.2rem; border-radius: 12px; font-weight: bold; color: #fff; background: var(--primary); display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); border: none; transform: translateY(-2px);">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="glass" style="padding: 0.75rem 1.2rem; border-radius: 12px; color: var(--text-main); text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--primary)';" onmouseout="this.style.transform='none'; this.style.borderColor='var(--glass-border)';">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="glass" style="padding: 0.75rem 1.5rem; border-radius: 12px; color: var(--text-main); text-decoration: none; font-weight: 600; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                Selanjutnya
            </a>
        @else
            <span class="glass disabled" style="padding: 0.75rem 1.5rem; border-radius: 12px; opacity: 0.5; cursor: not-allowed; color: var(--text-muted); font-weight: 600; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
                Selanjutnya
            </span>
        @endif
    </nav>
@elseif($paginator->total() <= 2)
    <div style="display: flex; justify-content: center;">
        <a href="javascript:history.back()" class="glass" style="padding: 0.75rem 1.5rem; border-radius: 12px; color: var(--text-main); text-decoration: none; font-weight: 600; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--primary)';" onmouseout="this.style.transform='none'; this.style.borderColor='var(--glass-border)';">
            Kembali ke halaman sebelumnya
        </a>
    </div>
@endif
