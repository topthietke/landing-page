import 'package:flutter/material.dart';
import 'package:hello_world/layouts/blogs/blog_card.dart';
import 'package:hello_world/layouts/blogs/blog_post.dart';
// ─── BLOG TAB ─────────────────────────────────────────────────────────────────

class BlogTab extends StatelessWidget {
  const BlogTab({super.key});

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: CustomScrollView(
        slivers: [
          const SliverToBoxAdapter(child: SizedBox(height: 16)),
          SliverList(
            delegate: SliverChildBuilderDelegate(
              (context, i) => BlogCard(post: blogPosts[i]),
              childCount: blogPosts.length,
            ),
          ),
          const SliverToBoxAdapter(child: SizedBox(height: 16)),
        ],
      ),
    );
  }
}
