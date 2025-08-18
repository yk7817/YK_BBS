const deleteAction = () => {
  // 全deleteボタンを取得
  let btns = document.querySelectorAll(".delete");
  // 全投稿データ
  let posts = document.querySelectorAll(".post_list");
  // deleteボタン押下後に展開するoverlayを作成
  const overlay = document.createElement("div");
  overlay.id = "overlay";
  overlay.className =
    "fixed top-0 left-0 bg-white opacity-50 h-screen w-screen flex justify-center items-center";
  btns.forEach((btn, index) => {
    btn.addEventListener("click", (e) => {
      // postデータ取得
      const post = posts[index].querySelector(".post");
      const postDetail = post.querySelectorAll("p");
      // pタグのname index
      const name = postDetail[1].textContent;
      // pタグのcomment index
      const comment = postDetail[2].textContent;
      // postlistのdatasetとbtnに仕込んだdataset
      const postId = post.dataset.id;
      const btnId = btn.dataset.id;
      if (postId === btnId) {
        document.body.appendChild(overlay);
        const deleteContent = `<div class="bg-">
            <p>${name}</p>
            <p>${comment}</p>
        </div>`;
        overlay.innerHTML = deleteContent;
      }
    });
  });
};

deleteAction();
