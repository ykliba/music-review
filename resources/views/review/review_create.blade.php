<div class="test">
  testです
</div>
<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           レビュー投稿
       </h2>

   </x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				@if (session('status'))
				<div class="success mt-5 px-4 text-green-900">
					{{ session('status') }}
				</div>
				@endif
				<!-- ページ固有要素 -->
				<div class="mt-5 px-4 py-5">
					<!-- エラー表示 -->
					<form method="post" action="{{ route('store_review') }}">
						@csrf
						<div class="mb-4">
							<label for="review_title" class="block mb-2">タイトル</label>
							<input type="text" 
								id="recipe_name" 
								class="form-input w-full" 
								name="title"
								value="{{ old('title') }}"
								placeholder="タイトル" />
							@if ($errors->has('title'))
							<span class="error mb-4 text-red-900">{{ $errors->first('title') }}</span>
							@endif
						</div>
						<div class="mb-4">
							<label for="review_artist" class="block mb-2">アーティスト名</label>
							<input type="text" 
								id="recipe_url" 
								class="form-input w-full" 
								name="artist"
								value="{{ old('artist') }}"
								placeholder="https://xxxxx" />
							@if ($errors->has('artist'))
							<span class="error mb-4 text-red-900">{{ $errors->first('artist') }}</span>
							@endif
						</div>
						<div class="mb-4">
							<label for="review_desc" class="block mb-2">説明</label>
							<textarea type="text" 
								id="recipe_description" 
								class="form-input w-full" 
								name="desc"
								rows="5"
								>{{ old('desc') }}</textarea>
							@if ($errors->has('desc'))
							<span class="error mb-4 text-red-900">{{ $errors->first('desc') }}</span>
							@endif
						</div>
						
						<div class="mb-4 flex items-center">
							<input type="submit" value="作成" class="bg-blue-500 text-white font-bold py-2 px-4 rounded" />
						</div>
					</form>
				</div>
				<!-- /ページ固有要素 ここまで -->
			</div>
		</div>
	</div>
</x-app-layout>