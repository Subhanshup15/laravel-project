import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';

export default function Index({ auth, posts }) {
    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this post?')) {
            router.delete(route('posts.destroy', id));
        }
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Posts" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <div className="flex justify-between items-center mb-6">
                                <h2 className="text-2xl font-bold">Posts</h2>
                                <Link
                                    href={route('posts.create')}
                                    className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Create Post
                                </Link>
                            </div>

                            <div className="space-y-4">
                                {posts.data && posts.data.length > 0 ? (
                                    posts.data.map((post) => (
                                        <div key={post.id} className="border p-4 rounded">
                                            <h3 className="text-xl font-semibold">{post.title}</h3>
                                            <p className="text-gray-600 mt-2">
                                                {post.content.substring(0, 100)}...
                                            </p>
                                            <div className="mt-4 flex gap-2">
                                                <Link
                                                    href={route('posts.show', post.id)}
                                                    className="text-blue-500 hover:underline"
                                                >
                                                    View
                                                </Link>
                                                {auth.user.id === post.user_id && (
                                                    <>
                                                        <Link
                                                            href={route('posts.edit', post.id)}
                                                            className="text-green-500 hover:underline"
                                                        >
                                                            Edit
                                                        </Link>
                                                        <button
                                                            onClick={() => handleDelete(post.id)}
                                                            className="text-red-500 hover:underline"
                                                        >
                                                            Delete
                                                        </button>
                                                    </>
                                                )}
                                            </div>
                                        </div>
                                    ))
                                ) : (
                                    <p className="text-gray-500">No posts found. Create your first post!</p>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}