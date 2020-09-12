<div class="p-plan-sidebar">
    <nav class="p-plan-sidebar__nav">
        <h5 class="p-plan-sidebar__head">条件で探す</h5>
        <ul class="p-plan-sidebar__nav-list">
            <li>
                <div class="p-plan-sidebar__category">
                    <span>カテゴリー</span>
                    <select class="c-select__category-search" name="category" required>
                        <option value="1">サーフボード置場</option>
                        <option value="2">サーフボード</option>
                        <option value="3">ウェットスーツ</option>
                    </select>
                </div>
                <div class="p-plan-sidebar__prefecture">
                    <span>都道府県</span>
                    <select class="c-select__prefecture" name="prefecture">
                        @foreach(config('prefecture') as $key => $area)
                        <option value="{{ $key }}">{{ $area }}</option>
                        @endforeach
                    </select>
                </div>
            </li>
        </ul>
    </nav>
</div>