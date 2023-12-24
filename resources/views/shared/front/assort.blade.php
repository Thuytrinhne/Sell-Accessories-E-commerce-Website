  <div class="body-assort">
            <ul class="body-assort-list">
              
            <ul>
    
</ul>

              @foreach($topCategories as $category)
              <li class="body-assort-item body-assort-item1">
                <a href="{{ route('get.products.by.category',[$category->id]) }}" class="body-assort-link"> {{$category->name_category}}
                  <i class="fa-solid fa-caret-down"></i>
                </a>
                <ul class="body-subAssort">
                    
                  @foreach($category->children as $item)
                
                  <li class="body-subAssort-item">
                      <a href="{{ route('get.products.by.category',[$item->id]) }}" class="body-subAssort-link">{{$item->name_category}}</a>
                    </li>
                   @endforeach
                </ul>
              </li>
              @endforeach
            </ul>
          </div>